document.addEventListener('DOMContentLoaded', () => {
  const shareBtn  = document.getElementById('sa-share');
  const shareText = document.getElementById('sa-share-text');

  if (!shareBtn) return;

  shareBtn.addEventListener('click', async () => {
    const url   = window.location.href;
    const title = document.title;

    if (navigator.share) {
      try {
        await navigator.share({ title, url });
      } catch (err) {
        // user cancelled — do nothing
      }
    } else {
      await navigator.clipboard.writeText(url);
      shareText.textContent = 'Copied!';
      setTimeout(() => shareText.textContent = 'Share', 2000);
    }
  });
});